package mandala.lijala.Appointment_Management;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.core.env.Environment;
import java.net.InetAddress;
import java.net.UnknownHostException;

@SpringBootApplication
public class AppointmentManagementApplication implements  CommandLineRunner{

	@Autowired
	private Environment environment;

	public static void main(String[] args) {
		SpringApplication.run(AppointmentManagementApplication.class, args);
	}

	@Override
	public void run(String... args) {
		try {
			String localhost = InetAddress.getLocalHost().getHostAddress();
			String serverPort = environment.getProperty("server.port");
			boolean isSslEnabled = environment.getProperty("server.ssl.enabled", Boolean.class, false);
			String protocol = isSslEnabled ? "https" : "http";
			System.out.println();
			System.out.println("\t Local: " + protocol + "://localhost:" + serverPort);
			System.out.println("\t External: " + protocol + "://" + localhost + ":" + serverPort);
			System.out.println();
		} catch (UnknownHostException e) {
			e.printStackTrace();
		}
	}

}
