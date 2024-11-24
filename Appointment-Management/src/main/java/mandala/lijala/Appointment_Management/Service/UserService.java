package mandala.lijala.Appointment_Management.Service;

import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;

import jakarta.transaction.Transactional;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Model.Role;
import mandala.lijala.Appointment_Management.Repository.UserRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.time.LocalDateTime;

@Service
public class UserService {
    @Autowired
    private UserRepository userRepository;

    @Autowired
    private RoleService roleService;

    private final PasswordEncoder passwordEncoder=new BCryptPasswordEncoder();
    @Transactional
    public User registerUser(User user){
        if (userRepository.findByEmail(user.getEmail()) != null) {
            throw new RuntimeException("Email already exists");
        }
        user.setPassword(passwordEncoder.encode(user.getPassword()));
        //Encode User's Password
        Role userRole=roleService.findRoleById(3);
        user.setRole(userRole);//set User as default role
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
    @Transactional
    public void changePasswordForUser(Integer userId, String currentPassword, String newPassword, String confirmNewPassword ){
        User user=findByID(userId);
        if(user==null){
            throw new IllegalArgumentException("User not found");
        }
        if (!passwordEncoder.matches(currentPassword,user.getPassword())){
            throw new IllegalArgumentException("Current Password is incorrect");

        }
        if (!newPassword.equals(confirmNewPassword)){
            throw new IllegalArgumentException("New passwords do not match");
        }
        user.setPassword(passwordEncoder.encode(newPassword));
        user.setUpdatedAt(LocalDateTime.now());
        userRepository.save(user);


    }
}
