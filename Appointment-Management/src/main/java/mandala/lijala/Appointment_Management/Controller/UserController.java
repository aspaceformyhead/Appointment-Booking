package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("api/user")
public class UserController {
    @Autowired
    private UserService userService;

    @PostMapping("/signup")
    public ResponseEntity<String> registerUser(@RequestParam String firstName,
                                               @RequestParam String middleName,
                                               @RequestParam String lastName,
                                               @RequestParam String mobileNumber,
                                               @RequestParam String email,
                                               @RequestParam String password,
                                               @RequestParam String confirmPassword)

    {
        if (firstName == null ||lastName == null || mobileNumber == null || password == null || confirmPassword == null) {
            return ResponseEntity.badRequest().body("All required fields must be filled");
        }
        if(!password.equals(confirmPassword)){
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
        try{
            userService.registerUser(user);
            return ResponseEntity.ok("User registered Successfully");
        } catch (RuntimeException e) {
            return ResponseEntity.badRequest().body("Email already exists");
        }

    }
    @PostMapping("/login")
    public ResponseEntity<String> loginUser(
            @RequestParam String email,
            @RequestParam String password
            ) {

        if (userService.authenticateUser(email, password)) {
            return ResponseEntity.ok("Login successful");
        } else {
            return ResponseEntity.status(401).body("Invalid email or password");
        }
    }




}
