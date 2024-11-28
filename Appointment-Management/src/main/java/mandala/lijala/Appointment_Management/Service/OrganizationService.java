package mandala.lijala.Appointment_Management.Service;

import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.Organization;
import mandala.lijala.Appointment_Management.Repository.OrganizationRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.List;

import static java.util.regex.Pattern.matches;

@Service
public class OrganizationService {

    private final BCryptPasswordEncoder passwordEncoder=new BCryptPasswordEncoder();

    @Autowired
    private OrganizationRepository organizationRepository;

    public List<Organization> findAll() {
        return organizationRepository.findAll();
    }
    public List<Organization> findOrganizationsByType(Integer typeId) {
        return organizationRepository.findByType_TypeId(typeId);  // Fetch organizations by typeId
    }

    public Organization findByEmail(String email) {
        return organizationRepository.findByEmail(email);
    }
    public boolean authenticateOrganization(String email, String password) {
        Organization organization = findByEmail(email);
        return organization != null && matches(password, organization.getPassword());  // Use // Assuming password is stored in plain text; ideally, use hashed passwords
    }
}
