package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Doctor;
import org.springframework.data.jpa.repository.JpaRepository;

public interface DoctorRepository  extends JpaRepository<Doctor, Integer> {
    Doctor findByEmail(String email);
    Doctor findById(String d_ID);

}
