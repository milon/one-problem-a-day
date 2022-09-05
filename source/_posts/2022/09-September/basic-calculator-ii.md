---
extends: _layouts.post
section: content
title: Basic calculator II
problemUrl: https://leetcode.com/problems/basic-calculator-ii/
date: 2022-09-05
categories: [stack]
---

We will take a stack. Initially our operation and operand will be 0 and `+` append each character to the stack. If the character is numeric, until we reach an operand we will calculate the value. When we reach an operand, we will calculate the value and append it in the stack. Finally we will sum up the values of stack and return it.

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
            sign, value = '+', 0
            
            while i < len(s):
                if s[i].isnumeric():
                    value = value*10 + int(s[i])
                if s[i] in "+-*/":
                    append(sign, value)
                    sign, value = s[i], 0
                i += 1
            
            append(sign, value)
            return sum(stack)
        
        return calc(0)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`