
            <select name="access_list">
                <option value="select">-Select an Access Level-</option>
            <?php 
            $sql = 'SELECT DISTINCT access_level FROM users';
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='" .$row['access_level']."'>" .$row['access_level'] . "</option>";
            }
            ?>
    </select>
