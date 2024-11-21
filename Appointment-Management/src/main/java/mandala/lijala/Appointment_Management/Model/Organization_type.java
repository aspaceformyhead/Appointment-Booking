package mandala.lijala.Appointment_Management.Model;

import jakarta.persistence.*;

@Entity
@Table(name = "Organization_type")

public class Organization_type {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "typeid")
    private Long typeId;

    @Column(nullable = false)
    private String type;

    public Long getTypeId() {
        return typeId;
    }

    public void setTypeId(Long typeId) {
        this.typeId = typeId;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public boolean isDisplay() {
        return display;
    }

    public void setDisplay(boolean display) {
        this.display = display;
    }

    @Column(nullable = false)
    private boolean display = true;
}
