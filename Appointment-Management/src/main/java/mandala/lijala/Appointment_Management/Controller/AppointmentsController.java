package mandala.lijala.Appointment_Management.Controller;


import jakarta.servlet.http.HttpSession;
import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Service.AppointmentService;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import mandala.lijala.Appointment_Management.Service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import javax.print.Doc;
import java.sql.Date;
import java.sql.Time;
import java.util.List;
import java.util.Optional;


@RestController
@RequestMapping("api/booking")
public class AppointmentsController {
    @Autowired
    private AppointmentService appointmentService;
    @Autowired
    private UserService userService;
    @Autowired
    private DoctorService doctorService;

    @GetMapping("/doctorList")
    public ResponseEntity<List<Doctor>> getAllDoctors(){
        List<Doctor> doctors= doctorService.findAllDoctors();
        return ResponseEntity.ok(doctors);
    }

    @PostMapping("/create")
    public ResponseEntity<Appointments> createAppointment(
            @RequestParam String doctorID,
            @RequestParam ("date") Date appDate,
            @RequestParam("time") Time appTime,
            HttpSession session)
    {

        Integer userID=(Integer) session.getAttribute("userId");


        if (userID==null ){
            return ResponseEntity.badRequest().body(null);
        }
        User user=userService.findByID(userID);
        Optional<Doctor> optionalDoctor=doctorService.findById(doctorID);

        if (user==null || optionalDoctor.isEmpty()){
            return ResponseEntity.badRequest().body(null);

        }


        Doctor doctor=optionalDoctor.get();
        Appointments appointments=new Appointments();

        appointments.setUserID(user);
        appointments.setDoctorID(doctor);
        appointments.setAppDate(appDate);
        appointments.setAppTime(appTime);

        appointmentService.save(appointments);
        return ResponseEntity.ok(appointments);



    }


}
