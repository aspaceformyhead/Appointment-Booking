package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Doctor;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface DoctorRepository  extends JpaRepository<Doctor, String> {
    Doctor findByEmail(String email);
    List<Doctor> findByOrganizationId(Integer organizationId);

}
