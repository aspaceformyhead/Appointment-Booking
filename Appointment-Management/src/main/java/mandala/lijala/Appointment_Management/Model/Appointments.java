package mandala.lijala.Appointment_Management.Model;


import jakarta.persistence.*;
import mandala.lijala.Appointment_Management.Enum.Status;

import java.sql.Date;
import java.time.LocalDate;
import java.time.LocalTime;
import java.sql.Timestamp;

@Entity
@Table(name="appointments", uniqueConstraints = {
        @UniqueConstraint(columnNames = {"doctorID","appDate","appTime"})
})
public class Appointments {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "appointmentID", nullable = false, length = 11)
    private Integer appointmentID;


    @ManyToOne
    @JoinColumn(name = "userID", referencedColumnName = "userID", nullable = false)
    private User userID;

    @ManyToOne
    @JoinColumn(name ="organization", nullable = true,referencedColumnName = "Organizationid")
    private Organization organization;


    @ManyToOne
    @JoinColumn(name = "doctorID", nullable = false, referencedColumnName = "doctorid")
    private Doctor doctor;


    @Column(name = "appDate", nullable = false)
    private LocalDate appDate;

    @Column(name = "appTime", nullable = false)
    private LocalTime appTime;



    @Column(name = "concern", nullable = false, length = 50)
    private String concern;

    @Enumerated(EnumType.STRING)
    @Column(name = "status", nullable = false)
    private Status status;

    @Column(name = "createdAt")
    private Timestamp createdAt;

    @Column(name = "updatedAt")
    private Timestamp updatedAt;

    @Column(name = "display", nullable = false)
    private Boolean display = true;

    @Column (name="cancellationReason", nullable = true)
    private  String cancellationReason;

    public Integer getAppointmentID() {
        return appointmentID;
    }

    public void setAppointmentID(Integer appointmentID) {
        this.appointmentID = appointmentID;
    }

    public User getUserID() {
        return userID;
    }

    public void setUserID(User userID) {
        this.userID = userID;
    }

    public Doctor getDoctor() {
        return doctor;
    }

    public void setDoctor(Doctor doctor) {
        this.doctor = doctor;
    }

    public Timestamp getUpdatedAt() {
        return updatedAt;
    }

    public void setUpdatedAt(Timestamp updatedAt) {
        this.updatedAt = updatedAt;
    }

    public LocalDate getAppDate() {
        return appDate;
    }

    public void setAppDate(LocalDate appDate) {
        this.appDate = appDate;
    }

    public LocalTime getAppTime() {
        return appTime;
    }

    public void setAppTime(LocalTime appTime) {
        this.appTime = appTime;
    }

    public String getConcern() {
        return concern;
    }

    public void setConcern(String concern) {
        this.concern = concern;
    }

    public Status getStatus() {
        return status;
    }

    public void setStatus(Status status) {
        this.status = status;
    }

    public Timestamp getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }

    public Boolean getDisplay() {
        return display;
    }

    public void setDisplay(Boolean display) {
        this.display = display;
    }

    public String getCancellationReason() {
        return cancellationReason;
    }

    public void setCancellationReason(String cancellationReason) {
        this.cancellationReason = cancellationReason;
    }

    public Organization getOrganization() {
        return organization;
    }

    public void setOrganization(Organization organization) {
        this.organization = organization;
    }
}
