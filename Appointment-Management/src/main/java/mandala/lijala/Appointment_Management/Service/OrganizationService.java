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

    // Additional service methods (like saving, updating, deleting organizations) can be added here if needed
}
