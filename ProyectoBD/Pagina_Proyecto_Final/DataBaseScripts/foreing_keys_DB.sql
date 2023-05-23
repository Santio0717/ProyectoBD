-- empleados
ALTER TABLE empleados ADD CONSTRAINT FK_Compania_id FOREIGN KEY (Compania_ID) REFERENCES Compania (Comp_ID);
ALTER TABLE empleados ADD CONSTRAINT FK_Supervisor_id FOREIGN KEY (Supervisor_ID) REFERENCES Supervisor (S_ID);

-- C_Asociado
ALTER TABLE C_Asociado ADD CONSTRAINT FK_Emp_id3 FOREIGN KEY (Empleados_ID) REFERENCES empleados (E_ID);

-- Curso
ALTER TABLE Curso ADD CONSTRAINT FK_Emp_id4 FOREIGN KEY (Empleados_ID) REFERENCES empleados (E_ID);

-- Compania
ALTER TABLE Compania ADD CONSTRAINT FK_Area_id1 FOREIGN KEY (Area_ID) REFERENCES Area (A_id);
ALTER TABLE Compania ADD CONSTRAINT FK_UPri_id FOREIGN KEY (UbicacionPrincipal_ID) REFERENCES ubi_principal (uPri_ID);

-- ubi_principal
ALTER TABLE ubi_principal ADD CONSTRAINT FK_Ciudad_id FOREIGN KEY (Ciudad_ID) REFERENCES Ciudad (Ciu_ID);

-- Ciudad
ALTER TABLE Ciudad ADD CONSTRAINT FK_Estado_id FOREIGN KEY (Estado_ID) REFERENCES Estado (Est_ID);

-- Estado
ALTER TABLE Estado ADD CONSTRAINT FK_Pais_id FOREIGN KEY (Pais_ID) REFERENCES Pais (P_ID);