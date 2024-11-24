package mandala.lijala.Appointment_Management.Service;

import mandala.lijala.Appointment_Management.Model.Organization_type;
import mandala.lijala.Appointment_Management.Repository.OrgTypeRepository;
import org.springframework.beans.factory.annotation.Autowired;

import java.util.List;
import java.util.Optional;

public class OrgTypeService {

    @Autowired
    private OrgTypeRepository orgTypeRepository;


    public List<Organization_type> findAllOrganizationTypes(){
        return orgTypeRepository.findAll();
    }
    public Optional<Organization_type> findTypeById(Integer typeId) {
        return orgTypeRepository.findById(typeId);  // To fetch a specific organization type by ID
    }
}
