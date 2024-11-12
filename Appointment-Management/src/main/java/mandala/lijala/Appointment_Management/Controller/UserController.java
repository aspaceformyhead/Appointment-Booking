package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import mandala.lijala.Appointment_Management.Service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import jakarta.servlet.http.HttpSession;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.net.URI;
import java.util.Collections;

@RestController
@RequestMapping("api/user")
public class UserController {
    @Autowired
    private UserService userService;
    @Autowired
    private DoctorService doctorService;

    @PostMapping("/signup")
    public ResponseEntity<String> registerUser(@RequestParam String firstName,
                                               @RequestParam String middleName,
                                               @RequestParam String lastName,
                                               @RequestParam String mobileNumber,
                                               @RequestParam String email,
                                               @RequestParam String password,
                                               @RequestParam String confirmPassword) {
        if (firstName == null || lastName == null || mobileNumber == null || password == null || confirmPassword == null) {
            return ResponseEntity.badRequest().body("All required fields must be filled");
        }
        if (!password.equals(confirmPassword)) {
            return ResponseEntity.badRequest().body("Passwords do not match");
        }
        if (password.trim().isEmpty()) {
            return ResponseEntity.badRequest().body("Password cannot be empty");
        }

        User user = new User();
        user.setFirstName(firstName);
        user.setMiddleName(middleName);
        user.setLastName(lastName);
        user.setMobileNumber(mobileNumber);
        user.setEmail(email);
        user.setPassword(password);
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
        User user = userService.findByEmail(email);
        if (user != null && userService.authenticateUser(email, password)) {
            session.setAttribute("userId", user.getUserID());
            session.setAttribute("role", user.getRole());
            return ResponseEntity.status(HttpStatus.FOUND)
                    .location(URI.create("/patientDashboard")) // Redirect to the booking page
                    .build();
        }
        Doctor doctor = doctorService.findByEmail(email);
        if (doctor != null && doctorService.authenticateDoctor(email, password)) {
            session.setAttribute("doctorID", doctor.getId());
            session.setAttribute("role", "Doctor");

            System.out.println("Session ID: " + session.getId());
            System.out.println("Session Attributes: " + Collections.list(session.getAttributeNames()));
            System.out.println("DoctorID:" + session.getAttribute("doctorID"));
            return ResponseEntity.status(HttpStatus.FOUND).location(URI.create("/docView")).build();
        }


        return ResponseEntity.status(401).body("Invalid email or password");

    }

    @PostMapping("/logout")
    public ResponseEntity<String> logoutUser(HttpSession session) {
        session.invalidate();
        return ResponseEntity.ok("Logout Successful");
    }

    @GetMapping("/updateProfile")
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
        if(user==null){
            return ResponseEntity.badRequest().body("User not found");
        }
        user.setFirstName(firstName);
        user.setMiddleName(middleName);
        user.setLastName(lastName);
        user.setMobileNumber(mobileNumber);
        user.setEmail(email);

        try{
            userService.updateUser(user);
            return ResponseEntity.ok("Profile Updated sucessfully");

        }catch (RuntimeException e){
            return ResponseEntity.badRequest().body("Unable to update profile");
        }
    }
}

