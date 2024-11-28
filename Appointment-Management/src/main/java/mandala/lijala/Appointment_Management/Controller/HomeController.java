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
    @GetMapping("signup")
    public String signup(){
        return "signup";
    }
    @GetMapping("organization")
    public String organization(){
        return "organization";
    }
    @GetMapping("docView")
    public String docView(){
        return "docView";
    }
    @GetMapping("doctor")
    public String doctor(){
        return "doctor";
    }
    @GetMapping("patientDashboard")
    public String patientDashboard(){
        return "patientDashboard";
    }
    @GetMapping("appointment")
    public String appointment(){
        return "appoint";
    }
}
