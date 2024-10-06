package mandala.lijala.Appointment_Management.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class HomeController {
    @GetMapping("/booking")
    public String booking(){
        return "booking";
    }
    @GetMapping("/login")
    public String login(){
        return "login";
    }
}
