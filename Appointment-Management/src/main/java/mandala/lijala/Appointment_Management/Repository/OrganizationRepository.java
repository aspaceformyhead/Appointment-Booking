package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Organization;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface OrganizationRepository extends JpaRepository<Organization, Integer> {
    List<Organization> findByType_TypeId(@Param("typeId")Integer typeId);

}
