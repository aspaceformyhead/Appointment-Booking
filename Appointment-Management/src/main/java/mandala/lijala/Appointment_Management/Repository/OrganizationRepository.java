package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Organization;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface OrganizationRepository extends JpaRepository<Organization, Integer> {
    // Additional custom queries can be added here if needed
}
