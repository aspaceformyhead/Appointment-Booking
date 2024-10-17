package mandala.lijala.Appointment_Management.Service;

import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Repository.DoctorRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;
import java.util.Random;

@Service
public class DoctorService {
    @Autowired
    private DoctorRepository doctorRepository;

    private final BCryptPasswordEncoder passwordEncoder=new BCryptPasswordEncoder();

    public List<Doctor> findAllDoctors(){
        return doctorRepository.findAll();
    }
    public Optional<Doctor> findById(String doctorId){
        return doctorRepository.findById(doctorId);
    }
    public List<Doctor> getAllDoctors() {
        return doctorRepository.findAll(); // Assuming this method fetches all doctors
    }



    public  String generateDoctorId(){
        String letters=getRandomLetters(2);
        int randomNumber=new Random().nextInt(100000);
        return letters+String.format("%05d", randomNumber);

    }

    private String getRandomLetters(int length) {
        StringBuilder sb = new StringBuilder();
        Random random = new Random();
        for (int i = 0; i < length; i++) {
            char randomChar = (char) (random.nextInt(26) + 'A');
            sb.append(randomChar);
        }
        return sb.toString();
    }
    public Doctor registerDoctor (Doctor doctor){
        String doctorId=generateDoctorId();
        doctor.setId(doctorId);

        doctor.setPassword(passwordEncoder.encode(doctorId));

        return doctorRepository.save(doctor);

    }

    public Doctor findByEmail( String email) {
        return doctorRepository.findByEmail(email);
    }
    public boolean authenticateDoctor(String email, String password) {
        Doctor doctor = findByEmail(email);
        return doctor != null && passwordEncoder.matches(password, doctor.getPassword());  // Use // Assuming password is stored in plain text; ideally, use hashed passwords
    }

}
