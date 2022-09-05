---
extends: _layouts.post
section: content
title: Longest absolute file path
problemUrl: https://leetcode.com/problems/longest-absolute-file-path/
date: 2022-09-05
categories: [stack]
---

Use stack to represent structure of a directory where the root of a directory is at index 0. Directory level can be infer from the number of tabs. ie "" is level 0, "\n" is level 1 and so on.

Start by splitting input based on nextline. For each path, find the number of tabs and name of the folder/file. Then, while there exists a folder/file at lower level than the current path, pop it. Next, add the folder/file onto the stack. As you adding and popping folder/file from the stack, keep track of the length of stack. Lastly, once we reach a folder, update the result.

```python
class Solution:
    def lengthLongestPath(self, input: str) -> int:
        name = input.split("\n")
        curL, maxL = 0, 0
        stack = []
        for name in names:
            name = name.split("\t")
            tabs, name = len(name)-1, name[-1]
            
            while len(stack) > tabs:
                curL -= len(stack.pop())
            
            curL += len(name)
            stack.append(name)
            
            if '.' in stack[-1]:
                maxL = max(maxL, curL + len(stack)-1)   # added len(stack)-1 to add / for each folder/filename
        return maxL
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`