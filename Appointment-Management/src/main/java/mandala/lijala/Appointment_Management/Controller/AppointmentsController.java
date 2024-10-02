package mandala.lijala.Appointment_Management.Controller;


import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Service.AppointmentService;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import mandala.lijala.Appointment_Management.Service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.sql.Date;
import java.sql.Time;
import java.util.List;


@RestController
@RequestMapping("api/booking")
public class AppointmentsController {
    @Autowired
    private AppointmentService appointmentService;
    @Autowired
    private UserService userService;
    @Autowired
    private DoctorService doctorService;

    @PostMapping
    public ResponseEntity<Appointments> createAppointment(@RequestParam Integer userID,
                                                          @RequestParam String doctorID,
                                                          @RequestParam ("date") Date appDate,
                                                          @RequestParam("time") Time appTime)
    {

        User user= userService.findByID(userID);
        Doctor doctor=doctorService.findById(doctorID);
        if (user==null || doctor==null){
            return ResponseEntity.badRequest().body(null);
        }
        Appointments appointments=new Appointments();

        appointments.setUserID(user);
        appointments.setDoctorID(doctor);
        appointments.setAppDate(appDate);
        appointments.setAppTime(appTime);

        appointmentService.save(appointments);
        return ResponseEntity.ok(appointments);



    }

}
