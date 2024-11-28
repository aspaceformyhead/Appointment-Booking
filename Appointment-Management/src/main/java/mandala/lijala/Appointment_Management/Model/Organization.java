package mandala.lijala.Appointment_Management.Model;

import jakarta.persistence.*;

import javax.annotation.processing.Generated;


@Entity
@Table(name = "Organization")
public class Organization {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name="Organizationid", nullable = false)
    private Integer organizationId;

    @Column(name = "name", nullable = false)
    private String name;

    @Column(name = "email", nullable = false)
    private String email;

    @Column(name = "address", nullable = false)
    private String address;

    @Column(name = "phone", nullable = false)
    private String phone;

    @Column(name = "password", nullable = false)
    private String password;

      @Column (name = "display", nullable = false)
    private Boolean display=true;

    @ManyToOne
    @JoinColumn(name = "type", referencedColumnName = "typeid")
    private Organization_type type;

    public Integer getOrganizationId() {
        return organizationId;
    }

    public void setOrganizationId(Integer Organizationid) {
        this.organizationId = Organizationid;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
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

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public Organization_type getType() {
        return type;
    }

    public void setType(Organization_type type) {
        this.type = type;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public Boolean getDisplay() {
        return display;
    }

    public void setDisplay(Boolean display) {
        this.display = display;
    }
}
