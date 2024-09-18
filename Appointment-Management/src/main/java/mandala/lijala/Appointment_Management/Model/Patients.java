package mandala.lijala.Appointment_Management.Model;


import jakarta.persistence.*;

import java.time.LocalDate;

@Entity
@Table(name="patients")
public class Patients {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "p_Id") // Ensure this matches your primary key column name
    private Integer patientId;

    @Column(name = "p_firstName", nullable = false)
    private String firstName;

    @Column(name = "p_lastName", nullable = false)
    private String lastName;

    @Column(name = "gender", nullable = false)
    private String gender; // Using String for ENUM, or use enum type if preferred

    @Column(name = "dob", nullable = false)
    private LocalDate dob;

    @Column(name = "phoneNumber", length = 50, nullable = true)
    private String contactNumber;

    @Column(name = "email", length = 255, nullable = true)
    private String email;

    @Column(name = "address", length = 255, nullable = true)
    private String address;

    public Integer getPatientId() {
        return patientId;
    }

    public void setPatientId(Integer patientId) {
        this.patientId = patientId;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    public LocalDate getDob() {
        return dob;
    }

    public void setDob(LocalDate dob) {
        this.dob = dob;
    }

    public String getContactNumber() {
        return contactNumber;
    }

    public void setContactNumber(String contactNumber) {
        this.contactNumber = contactNumber;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }
}


