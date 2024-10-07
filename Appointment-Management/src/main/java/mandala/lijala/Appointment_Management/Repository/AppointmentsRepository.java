package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.User;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface AppointmentsRepository extends JpaRepository<Appointments, Integer> {
    List<Appointments> findByDoctor(Doctor doctor);
    List<Appointments> findByUserID(User userID);

     // This assumes the Doctor entity has an ID field


}
