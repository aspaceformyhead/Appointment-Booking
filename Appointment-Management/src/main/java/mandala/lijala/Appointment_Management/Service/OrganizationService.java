package mandala.lijala.Appointment_Management.Service;

import mandala.lijala.Appointment_Management.Model.Organization;
import mandala.lijala.Appointment_Management.Repository.OrganizationRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class OrganizationService {

    @Autowired
    private OrganizationRepository organizationRepository;

    public List<Organization> findAll() {
        return organizationRepository.findAll();
    }
    public List<Organization> findOrganizationsByType(Integer typeId) {
        return organizationRepository.findByType_TypeId(typeId);  // Fetch organizations by typeId
    }

}
