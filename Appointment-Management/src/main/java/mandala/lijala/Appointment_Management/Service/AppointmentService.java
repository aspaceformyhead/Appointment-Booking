package mandala.lijala.Appointment_Management.Service;

import jakarta.transaction.Transactional;
import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Repository.AppointmentsRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class AppointmentService {
    @Autowired
    private AppointmentsRepository appointmentsRepository;

    @Transactional
    public Appointments createAppointment (Appointments appointments)
    {
        return appointmentsRepository.save(appointments);
    }

    public List<Appointments> getAppointmentsByDoc(String doctorID){
        return appointmentsRepository.findbyDoctor_DoctorID(doctorID);
    }
    public List<Appointments> getAppointmentsByUser(Integer userID ){
        return appointmentsRepository.findbyUser_UserID(userID);

    }

    public List<Appointments> getAllappointments(){
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
}
