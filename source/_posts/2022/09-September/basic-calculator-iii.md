---
extends: _layouts.post
section: content
title: Basic calculator III
problemUrl: https://leetcode.com/problems/basic-calculator-iii/
date: 2022-09-05
categories: [stack]
---

We will take a stack. Initially our operation and operand will be 0 and `+` append each character to the stack. If the character is numeric, until we reach an operand we will calculate the value. When we reach an operand, we will calculate the value and append it in the stack. Finally we will sum up the values of stack and return it. But when we hit a `(`, we call the calc function to calculate everthing in the string until we reach `)`, and return it. We will do it recursively so we have the correct value every time.

```python
class Solution:
    def calculate(self, s: str) -> int:
        def calc(i):
            def append(operator, value):
                if operator == '+': stack.append(value)
                elif operator == '-': stack.append(-value)
                elif operator == '*': stack.append(stack.pop() * value)
                else: stack.append(int(stack.pop() / value))
            
            stack = []
            operator, value = '+', 0
            
            while i < len(s):
                if s[i].isnumeric():
                    value = value*10+int(s[i])
                elif s[i] in "+-*/":
                    append(operator, value)
                    operator, value = s[i], 0
                elif s[i] == '(':
                    value, j = calc(i+1)
                    i = j-1
                elif s[i] == ')':
                    append(operator, value)
                    return sum(stack), i+1
                i += 1
            
            append(operator, value)
            return sum(stack)
        
        return calc(0)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`