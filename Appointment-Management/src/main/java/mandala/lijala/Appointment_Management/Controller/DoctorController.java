package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.HttpStatusCode;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import javax.print.Doc;
import java.sql.Time;

@RestController
@RequestMapping("/api/doctor")
public class DoctorController {
    @Autowired
    private DoctorService doctorService;

    @PostMapping("/addDoc")
    public ResponseEntity<String> registerDoctor(@RequestParam String firstName,
                                                 @RequestParam(required = false) String middleName,
                                                 @RequestParam String lastName,
                                                 @RequestParam String email,
                                                 @RequestParam String contact,
                                                 @RequestParam String hospital,
                                                 @RequestParam String specialization,
                                                 @RequestParam Integer avg_time,
                                                 @RequestParam Integer fee,
                                                 @RequestParam String start_time,
                                                 @RequestParam String end_time

                                                 ){
        try{
            Doctor doctor=new Doctor();
            doctor.setFirstName(firstName);
            doctor.setMiddleName(middleName);
            doctor.setLastName(lastName);
            doctor.setEmail(email);
            doctor.setContact(contact);
            doctor.setHospital(hospital);
            doctor.setSpecialization(specialization);
            doctor.setAvg_time(avg_time);
            doctor.setFee(fee);
            Time startTime = Time.valueOf(start_time + ":00"); // Add seconds if needed
            Time endTime = Time.valueOf(end_time + ":00");
            doctor.setStart_time(startTime);
            doctor.setEnd_time(endTime);




            Doctor savedDoctor=doctorService.registerDoctor(doctor);
            return new ResponseEntity<>("Doctor registers successfully with ID:"+ savedDoctor.getD_id(), HttpStatus.CREATED);

        }
        catch (Exception e){
            return new ResponseEntity<>("Doctor registration failed"+e.getMessage(),HttpStatus.INTERNAL_SERVER_ERROR);

        }

    }
}
