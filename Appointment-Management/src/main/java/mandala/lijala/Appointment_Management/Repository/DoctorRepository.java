package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Doctor;
import org.springframework.data.jpa.repository.JpaRepository;

public interface DoctorRepository  extends JpaRepository<Doctor, String> {
    Doctor findByEmail(String email);

}
