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
    public String organizationtype(){return "organization";}
    @GetMapping("organizationtype")
    public String organization(){return "organizationtype";}
    @GetMapping("orgdashboard")
    public String orgdashboard(){return "orgdashboard";}
    @GetMapping("editorg")
    public String editorg(){return "editorg";}
    @GetMapping("manageorganization")
    public String manageorganization(){return "manageorganization";}
    @GetMapping("role")
    public String role(){return "role";}
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
}
