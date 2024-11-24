package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.Organization_type;
import mandala.lijala.Appointment_Management.Repository.OrgTypeRepository;
import mandala.lijala.Appointment_Management.Service.OrgTypeService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@RequestMapping("api/orgType")
public class OrgTypeController {
    @Autowired
    private OrgTypeRepository orgTypeRepository;

    @GetMapping
    public List<Organization_type>  getAllOrgType(){
        return orgTypeRepository.findAll();
    }
}
