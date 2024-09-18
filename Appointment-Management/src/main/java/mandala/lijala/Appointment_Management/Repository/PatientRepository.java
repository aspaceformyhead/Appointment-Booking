package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Patients;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface PatientRepository extends JpaRepository<Patients, Integer> {

@Query("SELECT p FROM Patients p")
List<Patients> findAllPatients();


}
