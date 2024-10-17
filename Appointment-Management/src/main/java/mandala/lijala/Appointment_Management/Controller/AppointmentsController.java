package mandala.lijala.Appointment_Management.Controller;

import jakarta.servlet.http.HttpSession;
import mandala.lijala.Appointment_Management.Enum.Status;
import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Service.AppointmentService;
import mandala.lijala.Appointment_Management.Service.DoctorService;
import mandala.lijala.Appointment_Management.Service.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataIntegrityViolationException;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.sql.Timestamp;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.time.format.DateTimeParseException;
import java.util.*;

@RestController
@RequestMapping("api/appointment")
public class AppointmentsController {
    @Autowired
    private AppointmentService appointmentService;
    @Autowired
    private UserService userService;
    @Autowired
    private DoctorService doctorService;

    @GetMapping("/doctorList")
    public ResponseEntity<List<Doctor>> getAllDoctors() {
        List<Doctor> doctors = doctorService.findAllDoctors();
        return ResponseEntity.ok(doctors);
    }

    @PostMapping("/create")
    public ResponseEntity<?> createAppointment(
            @RequestParam String doctorID,
            @RequestParam LocalDate appDate,
            @RequestParam String appTime,
            @RequestParam String concern,
            HttpSession session) {

        // Validate appTime format
        LocalTime time;
        try {
            time = LocalTime.parse(appTime, DateTimeFormatter.ofPattern("HH:mm:ss"));
        } catch (DateTimeParseException e) {
            return ResponseEntity.badRequest().body("Invalid time format. Please use HH:mm:ss.");
        }

        // Retrieve user ID from session
        Integer userID = (Integer) session.getAttribute("userId");
        if (userID == null) {
            return ResponseEntity.badRequest().body("No user ID found in session.");
        }

        // Fetch user and doctor
        User user = userService.findByID(userID);
        if (user == null) {
            return ResponseEntity.badRequest().body("User not found.");
        }

        Optional<Doctor> optionalDoctor = doctorService.findById(doctorID);
        if (optionalDoctor.isEmpty()) {
            return ResponseEntity.badRequest().body("Doctor not found with ID: " + doctorID);
        }

        // Create appointment
        Appointments appointments = new Appointments();
        appointments.setUserID(user);
        appointments.setConcern(concern);
        appointments.setDoctor(optionalDoctor.get());
        appointments.setAppDate(appDate);
        appointments.setAppTime(time);
        appointments.setStatus(Status.Confirmed);
        appointments.setCreatedAt(new Timestamp(System.currentTimeMillis()));
        appointments.setUpdatedAt(new Timestamp(System.currentTimeMillis()));

        // Save appointment
        try {
            appointmentService.save(appointments);


        } catch (DataIntegrityViolationException e) {
            return ResponseEntity.status(409).body("Chosen time already booked for this date. Choose another date or time.");

        }
        return ResponseEntity.ok("Appointment Confirmed. Please arrive on time on the appointment date. Thankyou!");
    }

    @GetMapping("/upcomingAppointments")
    public ResponseEntity<?> getUpcomingAppointmentsForDoctor(HttpSession session) {
        // Retrieve the logged-in doctor's ID from the session
        String doctorID = (String)  session.getAttribute("doctorID");
        if (doctorID == null) {
            String message = "Doctor ID not found in session. Please log in again.";
            System.out.println(message); // Log the message
            return ResponseEntity.badRequest().body(message);
        }
        Doctor doctor = doctorService.findById(doctorID).orElse(null);
        if (doctor == null) {
            String message = "Doctor not found. Please ensure your account is active.";
            System.out.println(message); // Log the message


            return ResponseEntity.badRequest().body(message);
        }

        List<Appointments> upcomingAppointments = appointmentService.getUpcomingAppointmentsForDoctor(doctor);// Convert appointments to a format suitable for the calendar
        Map<String, Object> response = new HashMap<>();
        response.put("doctorName", doctor.getFirstName() + " " + doctor.getLastName()); // Add doctor's name to response
        if (upcomingAppointments.isEmpty()) {
            String message = "No upcoming appointments found.";
            System.out.println(message); // Log the message
            return ResponseEntity.ok(Collections.singletonMap("message", message)); // Return a message indicating no appointments
        }
        return ResponseEntity.ok(upcomingAppointments);
    }
}
