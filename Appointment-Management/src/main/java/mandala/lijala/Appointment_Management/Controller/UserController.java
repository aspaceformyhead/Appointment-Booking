package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import mandala.lijala.Appointment_Management.Service.UploadimageService;
import mandala.lijala.Appointment_Management.Service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import jakarta.servlet.http.HttpSession;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import java.net.URI;

@RestController
@RequestMapping("api/user")
public class UserController {
    @Autowired
    private UserService userService;
    @Autowired
    private DoctorService doctorService;

    @Autowired
    public UploadimageService uploadimageService;

    @PostMapping("/signup")
    public ResponseEntity<String> registerUser(@RequestParam String firstName,
                                               @RequestParam String middleName,
                                               @RequestParam String lastName,
                                               @RequestParam String mobileNumber,
                                               @RequestParam String email,
                                               @RequestParam String password,
                                               @RequestParam String confirmPassword,
                                               @RequestParam MultipartFile image) {
        if (firstName == null || lastName == null || mobileNumber == null || password == null || confirmPassword == null) {
            return ResponseEntity.badRequest().body("All required fields must be filled");
        }
        if (!password.equals(confirmPassword)) {
            return ResponseEntity.badRequest().body("Passwords do not match");
        }
        if (password.trim().isEmpty()) {
            return ResponseEntity.badRequest().body("Password cannot be empty");
        }

        String imageUrl = uploadimageService.saveImage(image);

        User user = new User();
        user.setFirstName(firstName);
        user.setMiddleName(middleName);
        user.setLastName(lastName);
        user.setMobileNumber(mobileNumber);
        user.setEmail(email);
        user.setPassword(password);
        user.setImage(imageUrl);
        try {
            userService.registerUser(user);
            return ResponseEntity.status(HttpStatus.FOUND).location(URI.create("/login")).build();
        } catch (RuntimeException e) {
            return ResponseEntity.badRequest().body("Email or phone number already exists");
        }

    }

    @PostMapping("/login")
    public ResponseEntity<String> loginUser(
            @RequestParam String email,
            @RequestParam String password,
            HttpSession session
    ) {
        // Check if the user exists and authenticate
        User user = userService.findByEmail(email);
        if (user != null && userService.authenticateUser(email, password)) {
            session.setAttribute("userId", user.getUserID());
            session.setAttribute("role", user.getRole());
            return ResponseEntity.status(HttpStatus.FOUND)
                    .location(URI.create("/patientDashboard")) // Redirect to the booking page
                    .build();
        }

        // Check if the doctor exists and authenticate
        Doctor doctor = doctorService.findByEmail(email);
        if (doctor != null && doctorService.authenticateDoctor(email, password)) {
            session.setAttribute("doctorID", doctor.getId());
            session.setAttribute("role", "Doctor");

            System.out.println("Session ID: " + session.getId());
            System.out.println("DoctorID: " + session.getAttribute("doctorID"));
            System.out.println("Role: " + session.getAttribute("role"));

            return ResponseEntity.status(HttpStatus.FOUND).location(URI.create("/docView")).build();
        }

        // If authentication fails
        return ResponseEntity.status(401).body("Invalid email or password");

    }

    @PostMapping("/logout")
    public ResponseEntity<String> logoutUser(HttpSession session) {
        session.invalidate();
        return ResponseEntity.ok("Logout Successful");
    }

    @PostMapping("/updateProfile")
    public ResponseEntity<?> updateProfile(@RequestParam String firstName,
                                           @RequestParam(required = false) String middleName,
                                           @RequestParam String lastName,
                                           @RequestParam String mobileNumber,
                                           @RequestParam String email,
                                           HttpSession session) {
        Integer userID = (Integer) session.getAttribute("userId");
        if (userID == null) {
            return ResponseEntity.badRequest().body("Please log in");
        }
        User user = userService.findByID(userID);
        if (user == null) {
            return ResponseEntity.badRequest().body("User not found");
        }
        user.setFirstName(firstName);
        user.setMiddleName(middleName);
        user.setLastName(lastName);
        user.setMobileNumber(mobileNumber);
        user.setEmail(email);

        try {
            userService.updateUser(user);
            return ResponseEntity.ok("Profile Updated sucessfully");

        } catch (RuntimeException e) {
            return ResponseEntity.badRequest().body("Unable to update profile");
        }

    }

    @GetMapping("/profile")
    public String getProfilePage(HttpSession session, Model model) {
        Integer userId = (Integer) session.getAttribute("userId");
        if (userId == null) {
            // If the user is not logged in, redirect to the login page or show an error
            return "redirect:/login";
        }

        User user = userService.findByID(userId);
        if (user == null) {
            return "redirect:/login"; // If user is not found, redirect to login
        }

        // Pass user details to the model to be accessed in the front-end
        model.addAttribute("user", user);

        return "/patientDashboard"; // This is the name of your view (e.g., profile.html)
    }

    @PostMapping("/changePassword")
    public ResponseEntity<String> changePassword(
            @RequestParam String currentPassword,
            @RequestParam String newPassword,
            @RequestParam String confirmNewPassword,
            HttpSession session
    ) {
        try {
            Integer userId = (Integer) session.getAttribute("userId");
            if (userId == null) {
                return ResponseEntity.status(HttpStatus.UNAUTHORIZED).body("User not logged in");

            }

            userService.changePasswordForUser(userId, currentPassword, newPassword, confirmNewPassword);
            return ResponseEntity.ok("Password changed successfully");
        }
        catch(IllegalArgumentException e){
                return ResponseEntity.badRequest().body(e.getMessage());

            }

        }


    }




