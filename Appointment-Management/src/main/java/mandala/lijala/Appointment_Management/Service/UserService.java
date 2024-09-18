package mandala.lijala.Appointment_Management.Service;

import jakarta.transaction.Transactional;
import mandala.lijala.Appointment_Management.Enum.Role;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class UserService {
    @Autowired
    private UserRepository userRepository;

    @Transactional
    public User registerUser(User user){
        if (userRepository.findByEmail(user.getEmail()) != null) {
            throw new RuntimeException("Email already exists");
        }
        if (user.getRole() == null) {
            user.setRole(Role.User);  // Set a default role (e.g., USER)
        }
         return userRepository.save(user);
    }
}
