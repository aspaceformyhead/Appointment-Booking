package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.User;
import org.springframework.data.jpa.repository.JpaRepository;

public interface UserRepository extends JpaRepository<User, Integer> {
    User findByEmail(String email);
}


