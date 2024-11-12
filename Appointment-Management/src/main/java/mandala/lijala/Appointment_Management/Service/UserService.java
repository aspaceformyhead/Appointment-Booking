package mandala.lijala.Appointment_Management.Service;

import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;

import jakarta.transaction.Transactional;
import mandala.lijala.Appointment_Management.Enum.Role;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.time.LocalDateTime;

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
        user.setPassword(passwordEncoder.encode(user.getPassword()));//Encode User's Password
        user.setRole(Role.User);//set User as default role
        user.setDisplay(true);

        return userRepository.save(user);

    }

    public User findByID(Integer userID){
        return userRepository.findById(userID).orElse(null);
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

    public void updateUser(User user) {
        if (user==null || user.getUserID()==null){
            throw new IllegalArgumentException("USer or UserID cannot be null");
        }
        User existingUser=userRepository.findById(user.getUserID()).orElse(null);
        if(existingUser==null){
            throw new RuntimeException("User not found");


        }
        existingUser.setFirstName(user.getFirstName());
        existingUser.setMiddleName(user.getMiddleName());
        existingUser.setLastName(user.getLastName());
        existingUser.setMobileNumber((user.getMobileNumber()));
        existingUser.setEmail(user.getEmail());
        existingUser.setUpdatedAt(LocalDateTime.now());

        userRepository.save(existingUser);

    }
}
