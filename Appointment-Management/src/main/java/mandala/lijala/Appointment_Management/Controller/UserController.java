package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("api/user")
public class UserController {
    @Autowired
    private UserService userService;
    @PostMapping("/signup")
    public User registerUser(@RequestParam String username, @RequestParam String email, @RequestParam String password)

    {

        User user = new User();
        user.setUsername(username);
        user.setEmail(email);
        user.setPassword(password);

        return userService.registerUser(user);
    }

}
