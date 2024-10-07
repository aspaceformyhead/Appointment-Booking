package mandala.lijala.Appointment_Management.Model;

import jakarta.persistence.*;

import java.sql.Time;


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

    @Column(name = "hospital", nullable = false, length = 100)
    private String hospital;

    @Column(name = "specialization", nullable = false, length = 50)
    private String specialization;

    @Column(name = "avg_time", nullable = false)
    private Integer avg_time;

    @Column(name = "fee", nullable = false)
    private  Integer fee;

    @Column(name = "start_time", nullable = false)
    private Time start_time;

    @Column(name = "end_time", nullable = false)
    private Time end_time;

    @Column (name = "display", nullable = false)
    private Boolean display=true;

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

    public String getHospital() {
        return hospital;
    }

    public void setHospital(String hospital) {
        this.hospital = hospital;
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

    public Time getStart_time() {
        return start_time;
    }

    public void setStart_time(Time start_time) {
        this.start_time = start_time;
    }

    public Time getEnd_time() {
        return end_time;
    }

    public void setEnd_time(Time end_time) {
        this.end_time = end_time;
    }

    public Boolean getDisplay() {
        return display;
    }

    public void setDisplay(Boolean display) {
        this.display = display;
    }


}
