---
extends: _layouts.post
section: content
title: Maximum frequency stack
problemUrl: https://leetcode.com/problems/maximum-frequency-stack/
date: 2022-11-13
categories: [stack, design]
---

We will use a hashmap freq will count the frequence of elements and another hashmap stack is a map of stack. If element x has n frequence, we will push x n times in stack[1], stack[2] .. stack[n], max_freq records the maximum frequence. 

push(x) will push x to stack[++freq[x]] and pop() will pop from the stack[maxfreq]

```python
class FreqStack:
    def __init__(self):
        self.freq = defaultdict(int)
        self.stack = defaultdict(list)
        self.max_freq = 0

    def push(self, val: int) -> None:
        self.freq[val] += 1
        self.max_freq = max(self.max_freq, self.freq[val])
        self.stack[self.freq[val]].append(val)

    def pop(self) -> int:
        val = self.stack[self.max_freq].pop()
        self.freq[val] -= 1
        if not self.stack[self.max_freq]:
            self.max_freq -= 1
        return val
```
