package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Appointments;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface AppointmentsRepository extends JpaRepository<Appointments, Integer> {
    List<Appointments> findbyDoctor_DoctorID(String doctorID);
    List<Appointments> findbyUser_UserID(Integer userID);

}
