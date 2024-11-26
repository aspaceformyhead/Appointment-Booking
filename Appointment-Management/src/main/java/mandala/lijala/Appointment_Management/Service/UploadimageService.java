package mandala.lijala.Appointment_Management.Service;

import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.text.SimpleDateFormat;
import java.util.Date;

@Service
public class UploadimageService {
    private static final String IMAGE_FOLDER = "src/main/resources/static/img/";

    public String saveImage(MultipartFile photo) {
        if (photo == null || photo.isEmpty()) {
            return null;
        }

        // Ensure the directory exists
        File directory = new File(IMAGE_FOLDER);
        if (!directory.exists()) {
            directory.mkdirs();
        }

        try {
            // Get original file name and remove spaces
            String originalFileName = photo.getOriginalFilename();
            String fileNameWithoutSpaces = originalFileName.replaceAll("\\s+", "");

            // Extract file extension
            String extension = "";
            int dotIndex = fileNameWithoutSpaces.lastIndexOf('.');
            if (dotIndex >= 0) {
                extension = fileNameWithoutSpaces.substring(dotIndex);
                fileNameWithoutSpaces = fileNameWithoutSpaces.substring(0, dotIndex);
            }

            // Generate a new unique file name with timestamp
            String dateTime = new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date());
            String newFileName = fileNameWithoutSpaces + "_" + dateTime + extension;

            // Define path to save the file
            Path path = Paths.get(IMAGE_FOLDER + newFileName);

            // Write bytes of file to disk
            byte[] bytes = photo.getBytes();
            Files.write(path, bytes);

            return newFileName;
        } catch (IOException e) {
            e.printStackTrace();
            return null; // Return null if an error occurs
        }
    }
}
