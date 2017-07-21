Imports MySql.Data.MySqlClient
Imports System.Web
Imports System.IO
Imports System.Net.Mail
Public Class Form3
    Dim con As MySqlConnection
    Dim cm As MySqlCommand
    Dim Enroll As String = Nothing
    Dim username As String = Nothing
    Dim course As String = Nothing
    Dim stream As String = Nothing
    Public Shared email As String = Nothing
    Private Sub Form3_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        Dim user As String = student_page.userid
        con = New MySqlConnection
        con.ConnectionString = "server= 127.0.0.1;userid= root ;password= Gandu@1997;database= database3"
        Try
            con.Open()
            Dim Query As String = Nothing
            Query = "select * from library.student_list1 where enrollment_no= @user "
            cm = New MySqlCommand(Query, con)
            cm.Parameters.AddWithValue("user", user)
            Dim adaptor As New MySqlDataAdapter(cm)
            Dim table As New DataTable
            adaptor.Fill(table)
            If table.Rows.Count() > 0 Then
                Enroll = table.Rows(0)(0)
                username = table.Rows(0)(1)
                stream = table.Rows(0)(2)
                course = table.Rows(0)(3)
                email = table.Rows(0)(4)
            End If
            TextBox1.Text = Enroll
            TextBox2.Text = username
            TextBox3.Text = course
            TextBox4.Text = stream
            TextBox5.Text = email
            con.Close()
        Catch ex As MySqlException
            MessageBox.Show(ex.Message)
        Finally
            con.Dispose()

        End Try

    End Sub

    Private Sub Label7_MouseClick(sender As Object, e As MouseEventArgs) Handles Label7.MouseClick
        Dim book_name As String = InputBox("enter the name of the book>>", "enquiry box", "enter a name of book")
        Dim author As String = InputBox("enter the author name>>", "enquiry box", "author name")
        Try
            Dim mail As New MailMessage
            Dim smtpserver As New SmtpClient
            Dim admin_mail As String = "jontywillis49@gmail.com"
            smtpserver.Credentials = New Net.NetworkCredential("jontywillis49@gmail.com", "Gandu@1997")
            smtpserver.Port = "587"
            smtpserver.Host = "smtp.gmail.com"
            smtpserver.EnableSsl = True
            mail.To.Add(admin_mail)
            mail.From = New MailAddress(TextBox5.Text)
            mail.Subject = username + "requesting for a book"
            mail.Body = username + " is requesting for the book " + book_name + " by  " + author
            smtpserver.Send(mail)
            MsgBox("message has been sent successfully...")
        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
    End Sub
End Class