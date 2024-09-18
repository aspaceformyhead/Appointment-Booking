package mandala.lijala.Appointment_Management.Service;

import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;

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

    private final PasswordEncoder passwordEncoder=new BCryptPasswordEncoder();
    @Transactional
    public User registerUser(User user){
        if (userRepository.findByEmail(user.getEmail()) != null) {
            throw new RuntimeException("Email already exists");
        }
        user.setPassword(passwordEncoder.encode(user.getPassword()));
        user.setRole(Role.User);
         return userRepository.save(user);
    }


    public User findByEmail(String email){
        return userRepository.findByEmail(email);

    }
    public boolean authenticateUser(String email, String password) {
        User user = findByEmail(email);
        return user != null && passwordEncoder.matches(password, user.getPassword());
    }

    public PasswordEncoder getPasswordEncoder() {
        return passwordEncoder;
    }
}
