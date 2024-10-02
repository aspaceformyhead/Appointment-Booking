package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.sql.Time;
import java.util.List;
import java.util.Optional;

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
            return new ResponseEntity<>("Doctor registers successfully with ID:"+ savedDoctor.getId(), HttpStatus.CREATED);

        }
        catch (Exception e){
            return new ResponseEntity<>("Doctor registration failed"+e.getMessage(),HttpStatus.INTERNAL_SERVER_ERROR);

        }

    }
    @GetMapping
    public ResponseEntity<List<Doctor>> getAllDoctors(){
        List<Doctor> doctors= doctorService.findAllDoctors();
        return ResponseEntity.ok(doctors);
    }
    @GetMapping("/{id}")
    public ResponseEntity<Doctor> getDoctorById(@PathVariable String id) {
        Optional<Doctor> doctor = doctorService.findById(id);
        return doctor.map(ResponseEntity::ok).orElseGet(()-> ResponseEntity.notFound().build());
    }

}
