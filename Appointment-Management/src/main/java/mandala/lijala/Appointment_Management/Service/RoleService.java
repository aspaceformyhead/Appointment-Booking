package mandala.lijala.Appointment_Management.Service;

import mandala.lijala.Appointment_Management.Model.Role;
import mandala.lijala.Appointment_Management.Repository.RoleRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class RoleService {
    @Autowired
    private RoleRepository roleRepository;

    public Role findRoleById(Integer roleId){
        return roleRepository.findById(roleId).orElse(null);
    }
}
