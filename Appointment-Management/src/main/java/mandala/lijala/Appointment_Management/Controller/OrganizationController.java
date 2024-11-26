package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.Organization;
import mandala.lijala.Appointment_Management.Service.OrganizationService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/api/organizations")
public class OrganizationController {

    @Autowired
    private OrganizationService organizationService;

    @GetMapping
    public List<Organization> getAllOrganizations() {
        return organizationService.findAll();
    }
    @GetMapping("/byType/{orgType}")
    public List <Organization>getOrganizationByType(@PathVariable Integer orgType){
        return organizationService.findOrganizationsByType(orgType);
    }




}
