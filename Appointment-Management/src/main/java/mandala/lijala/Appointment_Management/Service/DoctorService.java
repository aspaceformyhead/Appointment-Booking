package mandala.lijala.Appointment_Management.Service;

import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Repository.DoctorRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import javax.print.Doc;
import java.util.List;
import java.util.Random;

@Service
public class DoctorService {
    @Autowired
    private DoctorRepository doctorRepository;

    public List<Doctor> findAllDoctors(){
        return doctorRepository.findAll();
    }
    public Doctor findById(String doctorId) {
        return doctorRepository.findById(doctorId);
    }


    private String generateDoctorId(){
        String letters=getRandomLetters(2);
        int randomNumber=new Random().nextInt(100000);
        return letters+String.format("%05d", randomNumber);

    }

    private String getRandomLetters(int length){
        StringBuilder sb=new StringBuilder();
        Random random= new Random();
        for(int i=0; i<length;i++){
            char randomChar=(char)(random.nextInt(26)+'A');
            sb.append(randomChar);
        }
        return sb.toString();

    }
    public Doctor registerDoctor (Doctor doctor){
        String doctorId=generateDoctorId();
        doctor.setD_id(doctorId);

        return doctorRepository.save(doctor);

    }
}
