package mandala.lijala.Appointment_Management.Controller;

import mandala.lijala.Appointment_Management.Enum.Role;
import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import mandala.lijala.Appointment_Management.Service.AppointmentService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.sql.Time;

import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.time.format.DateTimeParseException;
import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/api/doctor")
public class DoctorController {

    @Autowired
    private DoctorService doctorService;

    @Autowired
    private AppointmentService appointmentService;

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
                                                 @RequestParam String end_time) {
        try {


            Doctor doctor=new Doctor();
            doctor.setFirstName(firstName);
            doctor.setMiddleName(middleName);
            doctor.setLastName(lastName);
            doctor.setEmail(email);
            doctor.setContact(contact);
            doctor.setHospital(hospital);
            doctor.setSpecialization(specialization);
            doctor.setAvg_time(avg_time);
            doctor.setRole(Role.Doctor);
            doctor.setFee(fee);

            DateTimeFormatter formatter=DateTimeFormatter.ofPattern("[HH:mm:ss][HH:mm]");//using formatter to format local time to
            // avoid datetimeparse exception while storing in database
            LocalTime startTime=LocalTime.parse(start_time,formatter);
            LocalTime endTime = LocalTime.parse(end_time,formatter);

            doctor.setStart_time(startTime);
            doctor.setEnd_time(endTime);
            doctor.setStart_time(startTime);
            doctor.setEnd_time(endTime);

            // Save the doctor to the database
            Doctor savedDoctor = doctorService.registerDoctor(doctor);
            return new ResponseEntity<>("Doctor registered successfully with ID: " + savedDoctor.getId(), HttpStatus.CREATED);
        }
        catch (DateTimeParseException e) {
          return new ResponseEntity<>("Invalid time format. Please use HH:mm:ss.", HttpStatus.BAD_REQUEST);}
        catch (Exception e) {

            return new ResponseEntity<>("Doctor registration failed: " + e.getMessage(), HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }

    @GetMapping("/appointments")
    public ResponseEntity<List<Appointments>> getUpcomingAppointments(@RequestParam String doctorId) {
        try {
            Optional<Doctor> doctorOptional = doctorService.findById(doctorId);
            if (doctorOptional.isPresent()) {
                List<Appointments> appointments = appointmentService.getUpcomingAppointmentsForDoctor(doctorOptional.get());
                return new ResponseEntity<>(appointments, HttpStatus.OK);
            } else {
                return new ResponseEntity<>(HttpStatus.NOT_FOUND);
            }
        } catch (Exception e) {
            return new ResponseEntity<>(null, HttpStatus.INTERNAL_SERVER_ERROR);
        }
    }


