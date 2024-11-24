package mandala.lijala.Appointment_Management.Model;

import jakarta.persistence.*;
import mandala.lijala.Appointment_Management.Enum.Role;

import java.time.LocalTime;


@Entity
@Table(name="doctor")
public class Doctor {
    @Id
    @Column (name="id", nullable=false)
    private String id;

    @Column(name="firstName", nullable = false, length = 50)
    private String firstName;

    @Column(name = "middleName", nullable = true, length = 50)
    private String middleName;

    @Column(name="lastName", nullable = false, length = 50)
    private String lastName;

    @Column(name="email", nullable = true,length = 100)
    private String email;
    @Column(name = "contact", nullable = false, length = 10)
    private String contact;

    @ManyToOne
    @JoinColumn(name = "organization", nullable = true,referencedColumnName = "id")
    private Organization organization;

    @Column(name = "specialization", nullable = false, length = 50)
    private String specialization;

    @Column(name = "avg_time", nullable = false)
    private Integer avg_time;

    @Column(name = "fee", nullable = false)
    private  Integer fee;

    @Column(name = "start_time", nullable = false)
    private LocalTime start_time;

    @Column(name = "end_time", nullable = false)
    private LocalTime end_time;

    @Enumerated(EnumType.STRING)
    @Column (name = "role", nullable = true)
    private Role role;

    @Column (name = "display", nullable = false)
    private Boolean display=true;

    @Column(name="password", nullable = false)
    private String password;

    @Column(name="image", nullable = true)
    private String image;

    public Doctor() {
        this.display = true;
    }
    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getMiddleName() {
        return middleName;
    }

    public void setMiddleName(String middleName) {
        this.middleName = middleName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getContact() {
        return contact;
    }

    public void setContact(String contact) {
        this.contact = contact;
    }

    public Organization getOrganization() {
        return organization;
    }

    public void setOrganization(Organization organization) {
        this.organization = organization;
    }

    public String getSpecialization() {
        return specialization;
    }

    public void setSpecialization(String specialization) {
        this.specialization = specialization;
    }

    public Integer getAvg_time() {
        return avg_time;
    }

    public void setAvg_time(Integer avg_time) {
        this.avg_time = avg_time;
    }

    public Integer getFee() {
        return fee;
    }

    public void setFee(Integer fee) {
        this.fee = fee;
    }

    public LocalTime getStart_time() {
        return start_time;
    }

    public void setStart_time(LocalTime start_time) {
        this.start_time = start_time;
    }

    public LocalTime getEnd_time() {
        return end_time;
    }

    public void setEnd_time(LocalTime end_time) {
        this.end_time = end_time;
    }

    public Boolean getDisplay() {
        return display;
    }

    public void setDisplay(Boolean display) {
        this.display = display;
    }

    public Role getRole() {
        return role;
    }

    public void setRole(Role role) {
        this.role = role;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }
}
