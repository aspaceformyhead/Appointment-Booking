package mandala.lijala.Appointment_Management.Service;

import jakarta.transaction.Transactional;
import mandala.lijala.Appointment_Management.Enum.Status;
import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.Organization;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Repository.AppointmentsRepository;
import mandala.lijala.Appointment_Management.Repository.DoctorRepository;
import mandala.lijala.Appointment_Management.Repository.OrganizationRepository;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataIntegrityViolationException;
import org.springframework.stereotype.Service;

import java.time.LocalDate;
import java.time.LocalTime;
import java.util.List;
import java.util.Optional;

@Service
public class AppointmentService {
    @Autowired
    private AppointmentsRepository appointmentsRepository;
    @Autowired
    private DoctorRepository doctorRepository;

    @Autowired
    private OrganizationRepository organizationRepository;

    @Transactional
    public Appointments createAppointment(Appointments appointments)
    {
        try{
            return appointmentsRepository.save(appointments);

        }
        catch (DataIntegrityViolationException e){
            throw new RuntimeException("Chosen time already booked for this date. Choose another date or time.");
        }

    }

    public List<Appointments> getAppointmentsByDoctor(Doctor doctorID){
        return appointmentsRepository.findByDoctor(doctorID);
    }
    public List<Appointments> getAppointmentsByUser(User userID ){
        return appointmentsRepository.findByUserID(userID);

    }

    public List<Appointments> getAllAppointments(){
        return appointmentsRepository.findAll();


    }
    public Appointments getAppointmentByID(Integer id){
        return appointmentsRepository.findById(id).orElse(null);

    }
    public Appointments save(Appointments appointment) {
        return appointmentsRepository.save(appointment);
    }

    public void deleteAppointment(Integer id){
        appointmentsRepository.deleteById(id);
    }
    public List<Doctor> getAllDoctors(){
        return doctorRepository.findAll();
    }
    private boolean appointmentExists(Doctor doctor, LocalDate appDate, LocalTime appTime) {
        return appointmentsRepository.existsByDoctorAndAppDateAndAppTime(doctor, appDate, appTime);
    }
    // Service to fetch upcoming appointments for a specific doctor
    public List<Appointments> getUpcomingAppointmentsForDoctor(Doctor doctor) {
        return appointmentsRepository.findByDoctor(doctor);
    }
    public void cancelAppointment(Integer appointmentID, String cancellationReason) {
        Optional<Appointments> appointmentOpt=appointmentsRepository.findById(appointmentID);
        if (appointmentOpt.isPresent()) {
            Appointments appointment=appointmentOpt.get();
            appointment.setStatus(Status.Canceled);
            appointment.setCancellationReason(cancellationReason);

            appointmentsRepository.save(appointment);
        } else {
            throw new RuntimeException("Appointment not found with ID: " + appointmentID);
        }
    }
    public List<Appointments> getAppointmentHistoryByUserId(User userID) {
        // Assuming you have a repository that interacts with the database
        return appointmentsRepository.findByUserID(userID); // Implement this method in your repository
    }
    public Organization findOrganizationById(Integer id) {
        return organizationRepository.findById(id).orElse(null);
    }



}
