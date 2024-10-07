package mandala.lijala.Appointment_Management.Service;

import jakarta.transaction.Transactional;
import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.User;
import mandala.lijala.Appointment_Management.Repository.AppointmentsRepository;
import mandala.lijala.Appointment_Management.Repository.DoctorRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class AppointmentService {
    @Autowired
    private AppointmentsRepository appointmentsRepository;
    @Autowired
    private DoctorRepository doctorRepository;

    @Transactional
    public Appointments createAppointment(Appointments appointments)
    {
        return appointmentsRepository.save(appointments);
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
}
