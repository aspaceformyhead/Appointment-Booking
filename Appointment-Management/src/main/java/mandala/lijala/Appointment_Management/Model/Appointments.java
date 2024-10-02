package mandala.lijala.Appointment_Management.Model;


import jakarta.persistence.*;
import mandala.lijala.Appointment_Management.Enum.Status;

import java.sql.Date;
import java.sql.Time;
import java.sql.Timestamp;

@Entity
@Table(name="appointments")
public class Appointments {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name="appointmentID", nullable = false, length = 11)
    private Integer appointmentID;

    @ManyToOne
    @JoinColumn  (name = "userID", referencedColumnName = "userID", nullable = false)
    private User userID;

    @ManyToOne
    @JoinColumn(name = "doctorID", nullable = false, referencedColumnName = "id")
    private Doctor doctorID;

    @Column(name = "appDate", nullable = false)
    private Date appDate;

    @Column(name = "appTime", nullable = false)
    private Time appTime;

    @Column(name = "concern", nullable = false, length = 50)
    private String concern;

    @Enumerated(EnumType.STRING)
    @Column(name = "status", nullable = false)
    private Status status;

    @Column(name = "createdAt")
    private Timestamp createdAt;

    @Column (name ="updatedAt" )
    private Timestamp updatedAt;

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

    public Doctor getDoctorID() {
        return doctorID;
    }

    public void setDoctorID(Doctor doctorID) {
        this.doctorID = doctorID;
    }

    public Timestamp getUpdatedAt() {
        return updatedAt;
    }

    public void setUpdatedAt(Timestamp updatedAt) {
        this.updatedAt = updatedAt;
    }

    public Date getAppDate() {
        return appDate;
    }

    public void setAppDate(Date appDate) {
        this.appDate = appDate;
    }

    public Time getAppTime() {
        return appTime;
    }

    public void setAppTime(Time appTime) {
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


}
